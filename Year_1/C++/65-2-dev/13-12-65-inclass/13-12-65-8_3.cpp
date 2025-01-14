#include <iostream>
using namespace std;
int main(){
	
	int items;
	float price ,discountPercent ,totalAmount ,net ,discountPrice;
	
	cout << "Enter price = ";
	cin >> price;
	cout << "Enter items = ";
	cin >> items;
	cout << "Enter discount percent = ";
	cin >> discountPercent;
	
	totalAmount = items * price;
	discountPrice = (totalAmount * discountPercent) /100;
	net = totalAmount - discountPrice;
	
	cout << "Total amount = " << totalAmount << endl;
	cout << "Discount = " << discountPrice << endl;
	cout << "Net = " << net << endl;
	
}
