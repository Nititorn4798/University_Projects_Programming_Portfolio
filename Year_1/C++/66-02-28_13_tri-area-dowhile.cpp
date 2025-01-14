#include <iostream>
using namespace std;
int main(){
    float height ,base ,area;
    char ans;
    bool EsuEsu;
    do{
        cout << "Input Height : ";
        cin >> height;
        cout << "Input Base : ";
        cin >> base;
        area = 0.5 * height * base;
        cout << "Area : " << area << endl;
        cout << "Would You Like To Calculate Again? (Y : N) : ";
        cin >> ans;
        if(ans=='Y'||ans=='y'){
            EsuEsu = true;
        }
        else EsuEsu = false;
    }while(EsuEsu==true);
    cout << "Exit Program!!";
}