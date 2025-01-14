#include <iostream>
using namespace std;
int main(){
    float scores;
    cout << "Input Scores = ";
    cin >> scores;
    if(scores>=90){
        cout << "Level C2";
    }
    else if(scores>=80){
        cout << "Level C1";
    }
    else if(scores>=60){
        cout << "Level B2";
    }
    else if(scores>=40){
        cout << "Level B1";
    }
    else if(scores>=30){
        cout << "Level A2";
    }
    else if(scores>=1){
        cout << "Level A1";
    }
    else cout << endl << "Error";
}