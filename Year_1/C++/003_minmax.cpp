#include <iostream>
using namespace std;
int main(){
    int min,max,i;
    cout << "Input Number : ";
    cin >> i;
    max = i;
    while(i!=0){
        if(i>max){
            max = i;
        }
        else min = i;
        cout << "Input Number : ";
        cin >> i;        
    }
    cout << "--End Task--\n";
    cout << "Min : " << min << " Max : " << max;
}