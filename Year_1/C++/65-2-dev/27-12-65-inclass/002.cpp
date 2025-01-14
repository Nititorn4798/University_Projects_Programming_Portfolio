#include <iostream>
using namespace std;
int main(){
	
	int unit;
	cout << "Input Your unit : ";
	cin >> unit;
	
	if(unit<500){
		cout << "You are General User";
	}else if(unit>=500&&unit<=2999){
		cout << "You are Small Business";
	}else {
		cout << "You are Large Business";		
	}

}
