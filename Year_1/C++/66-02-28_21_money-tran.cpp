#include <iostream>
using namespace std;
int main(){
    int moneyInput ,banknote1000 ,banknote500 ,banknote100 ,banknote50 ,banknote20 ,coin10 ,coin5 ,coin2 ,coin1;
    int tempM;
    cout << "Input Money : ";
    cin >> moneyInput;

    if(moneyInput<=0){
        cout << "Error!!!";
        return 0;
    }

    while(moneyInput>0){

        banknote1000 = moneyInput / 1000;
        moneyInput = moneyInput % 1000;
        cout << endl << "1000 : " << banknote1000 << "   " << moneyInput;

        banknote500 = moneyInput / 500;
        moneyInput = moneyInput % 500;
        cout << endl << "500 : " << banknote500 << "   " << moneyInput;

        banknote100 = moneyInput / 100;
        moneyInput = moneyInput % 100;
        cout << endl << "100 : "  << banknote100 << "   " << moneyInput;        

        banknote50 = moneyInput / 50;
        moneyInput = moneyInput % 50;
        cout << endl << "50 : "  << banknote50 << "   " << moneyInput;    

        banknote20 = moneyInput / 20;
        moneyInput = moneyInput % 20;
        cout << endl << "20 : "  << banknote20 << "   " << moneyInput;

        coin10 = moneyInput / 10;
        moneyInput = moneyInput % 10;
        cout << endl << "10 : "  << coin10 << "   " << moneyInput;    

        coin5 = moneyInput / 5;
        moneyInput = moneyInput % 5;
        cout << endl << "5 : " << coin5 << "   " << moneyInput;   

        coin2 = moneyInput / 2;
        moneyInput = moneyInput % 2;
        cout << endl << "2 : "  << coin2 << "   " << moneyInput;

        coin1 = moneyInput / 1;
        moneyInput = moneyInput % 1;
        cout  << endl << "1 : "  << coin2 << "   " << moneyInput;
    }

    cout << endl << "Banknote 1000 : " << banknote1000 << endl
        << "Banknote 500 : " << banknote500 << endl 
        << "Banknote 100 : " << banknote100 << endl 
        << "Banknote 50 : " << banknote50 << endl 
        << "Banknote 20 : " << banknote20 << endl 
        << "Coin 10 : " << coin10 << endl 
        << "Coin 5 : " << coin5 << endl 
        << "Coin 2 : " << coin2 << endl 
        << "Coin 1 : " << coin1;
}

















/*
        banknote500 = moneyInput % 500;
        tempM = banknote500 * 500;
        moneyInput -= tempM;

        banknote100 = moneyInput % 100;
        tempM = banknote100 * 100;
        moneyInput -= tempM;

        banknote50 = moneyInput % 50;
        tempM = banknote50 * 50;
        moneyInput -= tempM;

        banknote20 = moneyInput % 20;
        tempM = banknote20 * 20;
        moneyInput -= tempM;

        coin10 = moneyInput % 10;
        tempM = coin10 * 10;
        moneyInput -= tempM;

        coin5 = moneyInput % 5;
        tempM = coin5 * 5;
        moneyInput -= tempM;        

        coin2 = moneyInput % 2;
        tempM = coin2 * 2;
        moneyInput -= tempM;

        coin1 = moneyInput % 1;
        tempM = coin1 * 1;
        moneyInput -= tempM;
*/
/*        cout << endl << "Banknote 1000 : " << banknote1000 << endl
        << "Banknote 500 : " << banknote500 << endl 
        << "Banknote 100 : " << banknote100 << endl 
        << "Banknote 50 : " << banknote50 << endl 
        << "Banknote 20 : " << banknote20 << endl 
        << "Coin 10 : " << coin10 << endl 
        << "Coin 5 : " << coin5 << endl 
        << "Coin 2 : " << coin2 << endl 
        << "Coin 1 : " << coin1;*/