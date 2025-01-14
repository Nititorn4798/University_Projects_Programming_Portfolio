#include <iostream>
using namespace std;
int main(){
	int ip ,i ,j ,o ,p;
	cout << "Input : ";
	cin >> ip;
	//Top
	for(i=1;i<=ip;i++){
		for(j=1;j<=i;j++){
			cout << "X";
		}
		cout << endl;
	}
	//Bottom
	for(o=ip-1;o>0;o--){
		for(p=o;p>0;p--){
			cout << "X";
		}
		cout << endl;
	}
}