#include <stdio.h>
#include <string.h>

void main() {
  char command[99];
  char at[1] = "~";
  char roles[1] = "$";
  while (1) {
    printf("nititorn4798@cs65019:%c%c ", at[0], roles[0]);
    scanf("%s", &command);
    if (strcmp(command, "exit") == 0)
      break;
    printf("%s\n", &command);
  }
}