#include <pthread.h>
#include <stdio.h>
#include <math.h>

int global_before = 1;
unsigned long global_result = 0;

void *t(int round_c)
{
    printf("[DEBUG >_<] Thread ID: %d To %d\n",gettid(), round_c);
    unsigned long i;
    unsigned long res = 0;
    for (i = global_before; i <= round_c; i++){
        res = res + i;
    }
    global_result += res;
    printf("[DEBUG >_<] Thread ID:  %d Done:\n\t%ld\n\tStart: %d, End: %d\n",gettid() , res, global_before, round_c);
    global_before = (int)round_c;
    pthread_exit(NULL);
}

int main() {
    int input_number_thread = 10;
    int input_number_tocal = 1000;

    float float_per_thread = input_number_tocal / input_number_thread;
    int per_thread_int = (int)floor(float_per_thread);

    //Idea GPT
    int remainder = input_number_tocal % input_number_thread;

    pthread_t thread_d[input_number_thread];
    
    for(int i = 0; i < input_number_thread; i++) {
        int per_thread_int_b = (int)per_thread_int * i + 1;
        if (i < remainder) { // ถ้า i อยู่ในช่วงตั้งแต่ 0 จนถึง remainder - 1 (เธรดที่อยู่ในช่วงนี้) จะได้รับงานเพิ่มขึ้น 1 หน่วย ((*arg)++).
            printf("Found remainder plus 1 to thread.\n");
            (per_thread_int_b)++;
        }
        pthread_create(&thread_d[i], NULL, t, per_thread_int_b);
    }
    for(int i = 0; i < input_number_thread; i++) {
        pthread_join(thread_d[i], NULL);
    }

    printf("\nFinally Result is : %ld",global_result);

    return 0;
}
