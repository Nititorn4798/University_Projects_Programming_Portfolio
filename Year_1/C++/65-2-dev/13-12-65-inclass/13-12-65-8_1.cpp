#include <iostream>
using namespace std;
int main(){
	int heartbeatTotal ,hoursInput;
	cout << "Input Hours : ";
	cin >> hoursInput;
	heartbeatTotal = (70 * 60) * hoursInput;
	cout << "Total Heartbeat = " <<heartbeatTotal;
}
