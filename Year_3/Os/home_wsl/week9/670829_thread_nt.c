#include <pthread.h>
#include <stdio.h>

void *onetob()
{
    printf("\nHi");
    unsigned long i = 0;
    unsigned long res = 0;
    for (i = 1; i<= 1007; i++){
        res = res + i;
    }
    printf("\nDone\n%ld\n",res);
}

void main() {
    onetob();
}