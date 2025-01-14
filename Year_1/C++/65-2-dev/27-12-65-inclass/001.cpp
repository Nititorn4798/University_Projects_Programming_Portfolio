#include <iostream>
using namespace std;
int main(){
	
	int age;
	cout << "Input Your age : ";
	cin >> age;
	
	if(age<=12){
		cout << "You are a child";
	}else if(age>=13&&age<=19){
		cout << "You are a teenager";
	}else if(age>=20&&age<=39){
		cout << "You are a early adulthood";
	}else if(age>=40&&age<=59){
		cout << "You are a late adulthood";
	}else {
		cout << "You are a old age";		
	}

}
