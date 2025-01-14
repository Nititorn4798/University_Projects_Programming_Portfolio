#include <pthread.h>
#include <stdio.h>

void *t(void *result)
{
    printf("\nA 1 - 500M");
    unsigned long i;
    unsigned long res = 0;
    for (i = 1; i<= 500000000; i++){
        res = res + i;
    }
    *((unsigned long*)result) = res;
    printf("\nA Done:\n%ld\n",res);
    pthread_exit((void*) res);
}

void *ftob(void *result)
{
    printf("\nB 500M - 1B");
    unsigned long ii;
    unsigned long res = 0;
    for (ii = 500000001; ii<= 1000000000; ii++){
        res = res + ii;
    }
    *((unsigned long*)result) = res;
    printf("\nB Done:\n%ld\n",res);
    // pthread_exit(res);
}

void main() {
    pthread_t thread1, thread2;
    unsigned long res_a = 0, res_b = 0, ress;
    pthread_create(&thread1, NULL, *t, &res_a);
    pthread_create(&thread2, NULL, *ftob, &res_b);

    pthread_join(thread1, NULL);
    pthread_join(thread2, NULL);
    ress = res_a + res_b;
    printf("\n\nResult:\n%ld\n",ress);
}

//เพิ่มการบวกค่า Done
//https://stackoverflow.com/questions/2251452/how-to-return-a-value-from-pthread-threads-in-c
