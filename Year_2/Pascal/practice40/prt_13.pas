program prt_13;
uses
  crt;
var
  orange : Integer = 10;
  profit : Real;
begin
  ClrScr;
  profit :=  ((orange * 15) * 2) - (orange * 15);
  WriteLn('Profit is : ',profit:0:2);
  ReadLn;
end.