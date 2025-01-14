#include <iostream>
using namespace std;
int main(){
	
	float price ,ans;
	cout << "Input Your Price : ";
	cin >> price;
	
	if(price<5000){
		ans = price;
		
	}else if(price>=5000&&price<=9999){
		ans = price - (price*0.05);
		
	}else if(price>=10000&&price<=29999){
		ans = price - (price*0.07);	
	}else {
		ans = price - (price*0.10);
	}
	cout << "Price = " << ans;
}
