#include <iostream>
using namespace std;
int main(){
	
	float carFrame , steelPrice;
	cout << "Input Car Frame : ";
	cin >> carFrame;
	steelPrice = (100 * carFrame) * 80;
	cout << "Total Steel Price = " << steelPrice;
}
