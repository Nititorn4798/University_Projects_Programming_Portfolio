#include <pthread.h>
#include <stdio.h>
#include <stdlib.h>
#include <math.h>
#include <unistd.h>
#include <string.h>
#include <sys/syscall.h>

unsigned long global_result = 0;
pthread_mutex_t result_mutex = PTHREAD_MUTEX_INITIALIZER;

typedef struct
{
    int start;
    int end;
} thread_data_t;

void *t(void *arg)
{
    thread_data_t *data = (thread_data_t *)arg;
    unsigned long res = 0;

    // printf("[DEBUG >_<] Thread ID: %ld Sum from %d to %d\n", syscall(SYS_gettid), data->start, data->end);

    for (int i = data->start; i <= data->end; i++)
    {
        res += i;
    }

    pthread_mutex_lock(&result_mutex);
    global_result += res;
    pthread_mutex_unlock(&result_mutex);

    // printf("[DEBUG ^O^] Thread ID: %ld Done:\n\tResult: %ld\n\tStart: %d, End: %d\n", syscall(SYS_gettid), res, data->start, data->end);
    free(data);
    pthread_exit(NULL);
}

int main(int argc, char *argv[])
    // argc คือ จำนวนพารามิเตอร์ที่ถูกส่งมา
    // argv คือ อาร์เรย์ของสตริงที่เก็บพารามิเตอร์
{
    // printf("Number of arguments: %d\n", argc);
    // printf("Program name: %s\n", argv[0]);

    // for (int i = 1; i < argc; i++) {
    //     printf("Argument %d: %s\n", i, argv[i]);
    // }
    if (argc < 2) {
        fprintf(stderr, "Usage: %s <threads number>\n", argv[0]);
        return 1;
    }

    char *endptr;
    int input_number_thread = strtol(argv[1], &endptr, 10);

    // ตรวจสอบข้อผิดพลาด
    if (*endptr != '\0') {
        fprintf(stderr, "Invalid input: %s\n", argv[1]);
        return 1;
    }
    int input_number_tocal = 1000000000;

    // printf("[Input :) ] Select the number of threads you want to use : ");
    // if (scanf("%d", &input_number_thread) != 1)
    // {
    //     fprintf(stderr, "Invalid threads input\n");
    //     return 1;
    // }

    int per_thread_int = input_number_tocal / input_number_thread;
    int remainder = input_number_tocal % input_number_thread;

    pthread_t thread_d[input_number_thread];

    int start = 1;
    for (int i = 0; i < input_number_thread; i++)
    {
        thread_data_t *data = malloc(sizeof(thread_data_t));
        if (data == NULL)
        {
            fprintf(stderr, "Failed to allocate memory\n");
            exit(1);
        }

        data->start = start;
        data->end = start + per_thread_int - 1;

        if (i < remainder)
        {
            data->end++; // Distribute the remainder among the first threads
        }

        start = data->end + 1;

        pthread_create(&thread_d[i], NULL, t, data);
    }

    for (int i = 0; i < input_number_thread; i++)
    {
        pthread_join(thread_d[i], NULL);
    }

    printf("\n[Info >_<] Threads : %s\n[Done ^O^] Finally Result is : %ld\n\n", argv[1], global_result);

    return 0;
}
