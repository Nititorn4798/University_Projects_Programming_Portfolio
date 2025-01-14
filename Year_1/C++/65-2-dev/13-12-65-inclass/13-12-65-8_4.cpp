#include <iostream>
using namespace std;
int main(){
	
	float totalPrice ,price ,vat;
	
	cout << "Input Total Price : ";
	cin >> totalPrice;
	
	price = totalPrice / 1.07;
	vat = totalPrice - price;
	cout << "Price = " << price 
	<< endl << "Vat = "  << vat;
	
}
