#include <pthread.h>
#include <stdio.h>
#include <math.h>

unsigned long global_result = 0;

void *t(int round_c)
{
    printf("\nThread Test DEBUG >_< , %d, Tid: %d",round_c, gettid());
    unsigned long i;
    unsigned long res = 0;
    for (i = 1; i <= round_c; i++){
        res = res + i;
    }
    global_result += res;
    printf("\nDBG %d Done:\n%ld\n",gettid() , res);
    pthread_exit(NULL);
}

int main() {
    int input_number_thread = 10;
    int input_number_tocal = 1000000000;

    float float_per_thread = input_number_tocal / input_number_thread;
    int per_thread_int = (int)floor(float_per_thread);

    pthread_t thread_d[input_number_thread];
    
    for(int i = 0; i < input_number_thread; i++) {
        pthread_create(&thread_d[0], NULL, *t, per_thread_int);
    }
    for(int i = 0; i < input_number_thread; i++) {
        pthread_join(thread_d[0], NULL);
    }

    printf("\nFinally Result is : %ld",global_result);

    return 0;
}
