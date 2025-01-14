#include <iostream>
using namespace std;
int main(){
    int people ,age , i,children = 0 ,kid = 0 ,work = 0 ,old = 0;
    cout << "Input Number of People : ";
    cin >> people;
    for(i=1;i<=people;i++){
        cout << "People " << i << " Age = ";
        cin >> age;
        if(age>=60){
            old++;
        }
        else if (age >=23){
            work++;
        }
        else if (age >=12){
            kid++;
        }
        else if (age >=1){
            children++;
        }
        else cout << endl << "Error";
    }
    cout << "Old = " << old << endl;
    cout << "Work = " << work << endl;
    cout << "Student = " << kid << endl;
    cout << "Children = " << children << endl;
    return 0;
}