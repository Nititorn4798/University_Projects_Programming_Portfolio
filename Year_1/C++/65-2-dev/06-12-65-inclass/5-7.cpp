#include <iostream>
using namespace std;
int main(){
	
	float weight ,height ,vBMI ,mf;
	cout << "Input Weight (Kg.) : ";
	cin >> weight;
	cout << "Input Height (Cm.) : ";
	cin >> height;
	height = height/100;
	vBMI = weight / (height*height);
	cout << "\nBMI = " << vBMI;
}
