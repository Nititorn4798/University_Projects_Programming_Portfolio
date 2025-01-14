#include <pthread.h>
#include <stdio.h>

void *thread(void *ptr)
{
	int num = (int) ptr;
	fprintf(stderr, "Hello World, Thread - %d\n", num);
	return ptr;
}

void *threadt(int testt)
{
    int i;
	int num = (int) testt;
	fprintf(stderr, "Test - %d\n", num);
    for (i = 0;i<= testt;i++){
        printf("inp %d, i,%d\n",testt, i);
    }
}

int main(int argc, char **argv)
{
	pthread_t thread1, thread2, thread3, thread4;
	int thr = 111;
	int thr2 = 222;
    int test = 5;

	pthread_create(&thread1, NULL, *thread, (void *) thr);
	pthread_create(&thread2, NULL, *thread, (void *) thr2);
	pthread_create(&thread3, NULL, *threadt, (void *) test);
	pthread_create(&thread4, NULL, *threadt, (void *) test);

	pthread_join(thread1, NULL);
	pthread_join(thread2, NULL);
	pthread_join(thread3, NULL);
	pthread_join(thread4, NULL);
	return 0;
}