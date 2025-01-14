program prt_1;
uses
    crt;
var
    num1, num2, num3 : Integer;
    ret_numavg : Real; (* ret = return *)

(*function definition *)
function avg(num1, num2, num3: Integer): Real;
var
    (* local variable declaration *)
    sumavg: Real;

begin
    sumavg := (num1 + num2 + num3) / 3;
    avg := sumavg;
end;

begin
    clrscr;
    Write('Input First Number (1) >>> ');
    ReadLn(num1);
    Write('Input Second Number (2) >>> ');
    ReadLn(num2);
    Write('Input Third Number (3) >>> ');
    ReadLn(num3);
    (* calling a function to get max value *)
    ret_numavg := avg(num1,num2,num3);

    WriteLn('Avg value Is : ', ret_numavg:0:3); (* number:เว้น:หลักทศนิยม *)
    ReadLn; (* กันโปรแกรมปิดทันที *)
end.
{ https://www.tutorialspoint.com/pascal/pascal_functions.htm }

