#include <stdio.h>

int main()
{
    // An integer variable
    int a = 100;

    // Pointer to integer
    int *ptr = &a;

    // Pointer to pointer (double pointer)
    int **dptr = &ptr;
    int ***ddptr = &dptr;
    int ****dddptr = &ddptr;
    int *****ddddptr = &dddptr;
    int ******dddddptr = &ddddptr;
    int *******ddddddptr = &dddddptr;

    printf("ddddd name is Randomly not true name");
    printf("Value of 'a' is : %d\n", a);
    printf("Value of 'a' using pointer (ptr) is : %d\n", *ptr);
    printf("Value of 'a' using double pointer (dptr) is : %d\n", **dptr);
    printf("Value of 'a' using ddouble pointer (dptr) is : %d\n", ***ddptr);
    printf("Value of 'a' using dddouble pointer (dptr) is : %d\n", ****dddptr);
    printf("Value of 'a' using ddddouble pointer (dptr) is : %d\n", *****ddddptr);
    printf("Value of 'a' using dddddouble pointer (dptr) is : %d\n", ******dddddptr);
    printf("Value of 'a' using ddddddouble pointer (dptr) is : %d\n", *******ddddddptr);
    printf("change value of ddddddptr");
    *******ddddddptr = 1000; /*Assign Value to a*/
    printf("Value of 'a' is : %d\n", a);
    printf("Value of 'a' using pointer (ptr) is : %d\n", *ptr);
    printf("Value of 'a' using double pointer (dptr) is : %d\n", **dptr);
    printf("Value of 'a' using ddouble pointer (dptr) is : %d\n", ***ddptr);
    printf("Value of 'a' using dddouble pointer (dptr) is : %d\n", ****dddptr);
    printf("Value of 'a' using ddddouble pointer (dptr) is : %d\n", *****ddddptr);
    printf("Value of 'a' using dddddouble pointer (dptr) is : %d\n", ******dddddptr);
    printf("Value of 'a' using ddddddouble pointer (dptr) is : %d\n", *******ddddddptr);

    return 0;
}