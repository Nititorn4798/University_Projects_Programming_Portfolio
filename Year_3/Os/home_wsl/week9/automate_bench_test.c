#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/wait.h>

int main() {
    for (int i = 1; i <= 20; i++) {
        pid_t pid = fork();

        if (pid < 0) {
            perror("fork");
            return 1;
        }

        if (pid == 0) {
            char i_str[12];
            snprintf(i_str, sizeof(i_str), "%d", i);
            execlp("time", "time", "./tsz_1b_arg", i_str, (char *)NULL);
            perror("execlp");
            exit(1);
        } else {
            int status;
            waitpid(pid, &status, 0);
            // Optional: Print or log status
        }
    }

    return 0;
}
