#include <pthread.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/syscall.h>

unsigned long global_result = 0;
pthread_mutex_t result_mutex = PTHREAD_MUTEX_INITIALIZER;

void *t(void *arg)
{
    int round_c = *((int *)arg);
    free(arg);  // Free the allocated memory for the argument

    printf("[DEBUG >_<] Thread ID: %ld  Sum 1 To %d\n", syscall(SYS_gettid), round_c);

    unsigned long i;
    unsigned long res = 0;
    for (i = 1; i <= round_c; i++) {
        res += i;
    }

    pthread_mutex_lock(&result_mutex);
    global_result += res;
    pthread_mutex_unlock(&result_mutex);

    printf("[DEBUG >_<] Thread ID: %ld Done:\n\t%ld\n", syscall(SYS_gettid), res);
    pthread_exit(NULL);
}

int main() {
    int input_number_thread = 10;
    int input_number_tocal = 1000000007;

    int per_thread_int = input_number_tocal / input_number_thread;
    int remainder = input_number_tocal % input_number_thread;

    pthread_t thread_d[input_number_thread];

    for (int i = 0; i < input_number_thread; i++) {
        int *arg = malloc(sizeof(*arg));
        if (arg == NULL) {
            fprintf(stderr, "Failed to allocate memory\n");
            exit(1);
        }

        *arg = per_thread_int;
        if (i < remainder) {
            printf("Found remainder, plus 1 to thread.\n");
            (*arg)++;
        }

        pthread_create(&thread_d[i], NULL, t, arg);
    }

    for (int i = 0; i < input_number_thread; i++) {
        pthread_join(thread_d[i], NULL);
    }

    printf("\nFinally Result is : %ld\n", global_result);

    return 0;
}
