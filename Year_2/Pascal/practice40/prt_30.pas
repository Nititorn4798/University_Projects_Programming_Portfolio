program prt_30;
uses
  crt;
var
  salary : Real;
begin
  ClrScr;
  Write('Input Salary : ');
  ReadLn(salary);
  if (salary >= 0) and (salary <=  10000) then
  else if (salary > 10000) and (salary <= 20000) then
    salary := salary - (salary * 0.1)
  else if (salary > 20000) then
    begin
    salary := salary - (salary * 0.2);
    end;
  WriteLn('Total Salary is ',salary:0:2);
  ReadLn;
end.
