#include <iostream>
using namespace std;
int main(){

	float fPrice, tPrice, disC;
	cout << "Input Price : ";
	cin >> fPrice;
	disC = fPrice * 0.20;
	tPrice = fPrice - disC;
	cout << "Total Price = " << tPrice;
	return 0;
	
}
