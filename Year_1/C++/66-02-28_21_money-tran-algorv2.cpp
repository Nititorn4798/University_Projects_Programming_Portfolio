#include <iostream>
using namespace std;
int main(){
    int moneyInput ,banknote1000 ,banknote500 ,banknote100 ,banknote50 ,banknote20 ,coin10 ,coin5 ,coin2 ,coin1;
    int tempM;
    cout << "Input Money : ";
    cin >> moneyInput;

/*    if(moneyInput<=0){
        cout << "Error!!!";
        return 0;
    }*/

    while(moneyInput>0){
		
		if(moneyInput>0 && moneyInput>=1000){
        banknote1000 = moneyInput / 1000;
        tempM = banknote1000 * 1000;
        moneyInput -= tempM;
        cout << "Banknote 1000 : " << banknote1000 << endl;
    }

		if(moneyInput>0 && moneyInput>=500){
        banknote500 = moneyInput / 500;
        tempM = banknote500 * 500;
        moneyInput -= tempM;
        cout << "Banknote 500 : " << banknote500 << endl;
    }

		if(moneyInput>0 && moneyInput>=100){
        banknote100 = moneyInput / 100;
        tempM = banknote100 * 100;
        moneyInput -= tempM;
        cout << "Banknote 100 : " << banknote100 << endl;
    }
        
		if(moneyInput>0 && moneyInput>=50){
        banknote50 = moneyInput / 50;
        tempM = banknote50 * 50;
        moneyInput -= tempM;
        cout << "Banknote 50 : " << banknote50 << endl;
    }

		if(moneyInput>0 && moneyInput>=20){
        banknote20 = moneyInput / 20;
        tempM = banknote20 * 20;
        moneyInput -= tempM;
        cout << "Banknote 20 : " << banknote20 << endl;
    }

		if(moneyInput>0 && moneyInput>=10){
        coin10 = moneyInput / 10;
        tempM = coin10 * 10;
        moneyInput -= tempM;
        cout << "Coin 10 : " << coin10 << endl;
    }

		if(moneyInput>0 && moneyInput>=5){
        coin5 = moneyInput / 5;
        tempM = coin5 * 5;
        moneyInput -= tempM;
        cout << "Coin 5 : " << coin5 << endl;     
    }

		if(moneyInput>0 && moneyInput>=2){
        coin2 = moneyInput / 2;
        tempM = coin2 * 2;
        moneyInput -= tempM;
        cout << "Coin 2 : " << coin2 << endl; 
    }

		if(moneyInput>0 && moneyInput>=1){
        coin1 = moneyInput / 1;
        tempM = coin1 * 1;
        moneyInput -= tempM;
        cout << "Coin 1 : " << coin1 << endl;
    }
    }
}
