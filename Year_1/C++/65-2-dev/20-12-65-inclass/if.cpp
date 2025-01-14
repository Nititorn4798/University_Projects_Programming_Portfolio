#include <iostream>
#include <string>
using namespace std;
int main(){
	
	string name;
	cout << "Input Your Name : ";
	cin >> name;
	if (name.length() > 0){
		
		cout << "The length of your name is: " << name.length();
		
	}
	
	cout << "\nEND";
	
}
