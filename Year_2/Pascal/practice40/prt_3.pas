program prt_3;
uses  
    crt;
const
    PI = 22/7;
var
    radius, ret_cirarea : Real;
function circlearea(radius:Real):Real;
var
    area : Real;
begin
    area := PI * radius * radius;
    circlearea := area;
end;

begin
    ClrScr;
    Write('Input Radius Of Circle >>> ');
    ReadLn(radius);
    ret_cirarea := circlearea(radius);
    WriteLn('PI is ',PI);
    Write('Your Area of Circle is ',ret_cirarea:0:2);
    ReadLn;
end.
