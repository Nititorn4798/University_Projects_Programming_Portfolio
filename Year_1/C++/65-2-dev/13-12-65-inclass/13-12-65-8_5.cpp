#include <iostream>
using namespace std;
int main(){
	
	float radiusInput ,Area ,Circumference;
	
	cout << "Input Radius : ";
	cin >> radiusInput;
	
	Area = 3.14 * (radiusInput * radiusInput);
	Circumference = 2 * radiusInput * 3.14;
	
	cout << "Circle Area = " << Area 
	<< endl << "Circumference = " << Circumference;
}
