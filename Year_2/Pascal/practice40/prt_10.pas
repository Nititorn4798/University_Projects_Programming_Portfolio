program prt_10;
uses
  crt;
const
  vat = 0.02;
var
  salary : Real;
  q : Char;
function totalsalary(salary:Real):Real;
  begin
    totalsalary := salary - (salary * vat);
  end;

begin
  repeat
    ClrScr;
    Write('Input Salary : ');
    ReadLn(salary);
    WriteLn('Net salary : ',totalsalary(salary):0:3);
    Write('Do you want to use the program again? [Y/N]: ');
    ReadLn(q);
  until (UpCase(q) <> 'Y');
end.