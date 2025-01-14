#include <iostream>
using namespace std;
int main(){
	int buyPen;
	float disc ,total;
	cout << "Input number of pen : ";
	cin >> buyPen;
	
	if(buyPen>15){
		disc = (buyPen*100)*(.3);
	}
	else if(buyPen>10){
		disc = (buyPen*100)*(.2);		
	}
	else if(buyPen>4){
		disc = (buyPen*100)*(.1);		
	}
	else if(buyPen>0){
		disc = (buyPen*100)*(0);			
	}
	total = (buyPen*100) - disc;
	cout << "Discount : " << disc << endl;
	cout << "Net : " << total << endl;
		
}