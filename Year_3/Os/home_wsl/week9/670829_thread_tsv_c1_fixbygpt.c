/*! Fix By GPT
Your code has a few issues that need addressing to work correctly with pthreads and achieve the desired functionality. Here are the key points and fixes:

Thread Function Signature: The thread function t should have a signature that matches void *(*start_routine) (void *). Therefore, it should take a void * argument and return a void *.

Thread Argument Passing: The pthread_create function requires a pointer to a function that matches the signature above. You need to pass a pointer to the thread function and cast the arguments appropriately.

Thread Identification: The gettid() function you used is not a standard POSIX function. Instead, use pthread_self() to get the thread ID, or use syscall(SYS_gettid) on Linux.

Thread Array Indexing: In the pthread_create and pthread_join calls, you're using thread_d[0] repeatedly. You should use thread_d[i] to create and join the respective threads.

Global Result Accumulation: The access to global_result should be protected by a mutex to avoid race conditions.

Argument Passing to Threads: Each thread needs to receive its own argument value.
*/

/*
Key Changes:
Function Signature: Changed t to thread_func and updated its signature.
Thread Argument Passing: Allocated memory for each thread’s argument and passed it correctly.
Thread Array Indexing: Used i for proper indexing.
Mutex for Global Result: Added pthread_mutex_t to synchronize access to global_result.
*/


#include <pthread.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/syscall.h>

#define THREAD_COUNT 10
#define TO_CALCULATE 1007 // จำนวนที่ไม่ลงตัว

unsigned long global_result = 0;
pthread_mutex_t result_mutex = PTHREAD_MUTEX_INITIALIZER;

void *thread_func(void *arg) {
    int round_c = *((int *)arg);
    free(arg);  // Free the allocated memory for the argument

    unsigned long i;
    unsigned long res = 0;
    for (i = 1; i <= round_c; i++) {
        res += i;
    }

    pthread_mutex_lock(&result_mutex);
    global_result += res;
    pthread_mutex_unlock(&result_mutex);

    printf("\nThread Done: %lu, Tid: %ld\n", res, (long)syscall(SYS_gettid));
    pthread_exit(NULL);
}

int main() {
    pthread_t threads[THREAD_COUNT];
    int per_thread_int = TO_CALCULATE / THREAD_COUNT;
    int remainder = TO_CALCULATE % THREAD_COUNT;

    for (int i = 0; i < THREAD_COUNT; i++) {
        int *arg = malloc(sizeof(*arg));
        if (arg == NULL) {
            fprintf(stderr, "Failed to allocate memory\n");
            exit(1);
        }
        *arg = per_thread_int;
        
        // แจกจ่ายงานที่เหลือให้กับเธรดแรกๆ
        if (i < remainder) {
            (*arg)++;
        }

        pthread_create(&threads[i], NULL, thread_func, arg);
    }

    for (int i = 0; i < THREAD_COUNT; i++) {
        pthread_join(threads[i], NULL);
    }

    printf("\nFinally Result is : %lu\n", global_result);
    return 0;
}

