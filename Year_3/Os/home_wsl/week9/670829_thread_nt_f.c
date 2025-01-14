#include <pthread.h>
#include <stdio.h>

void *onetob(void *arg)
{
    printf("\nHi");
    unsigned long i = 0;
    unsigned long res = 0;
    for (i = 1; i<= 1000; i++){
        res = res + i;
    }
    printf("\nDone\n%ld\n",res);
    pthread_exit(NULL); // หรือ return NULL; ก็ได้
}

int main() {
    pthread_t thread;
    pthread_create(&thread, NULL, onetob, NULL);
    pthread_join(thread, NULL);
    
    return 0;
}
