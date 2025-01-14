#include <stdio.h>
void main(){
	int x = 0;
	long int sum_x = 0;
	for (x = 1;x<=1000000;x++) {
		sum_x += x;
	}
	printf("%li",sum_x);
}
