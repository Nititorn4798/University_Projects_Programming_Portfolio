#include <stdio.h>
#include <string.h>
void main(){
    while (1) {
        char command[99];
        char at[1] = "~";
        char roles[1] = "$";
        printf("nititorn4798@cs65019:%c%c ",at[0],roles[0]);
        // scanf("%s", command);
        fgets(command, 99, stdin);
        if (strcmp(command,"exit") == 0)
    		break;
        printf("%s", command);
    }
}