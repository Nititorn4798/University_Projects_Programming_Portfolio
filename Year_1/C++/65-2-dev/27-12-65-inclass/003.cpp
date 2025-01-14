#include <iostream>
using namespace std;
int main(){
	
	float unit ,ans;
	cout << "Input Your Unit : ";
	cin >> unit;
	
	if(unit<100){
		ans = unit * 6.75;
		
	}else if(unit>=100&&unit<=499){
		ans = unit * 5.75;
		
	}else if(unit>=500&&unit<=999){
		ans = unit * 4.75;	
	}else {
		ans = unit * 3.25;
	}
	cout << "Water bill is = " << ans;
}
