#include <stdio.h>
void main(){
	int x = 0;
	long long int sum_x = 0;
	for (x = 1;x<=1000000;x++) {
		sum_x += x;
	}
	printf("%lld",sum_x);
}
