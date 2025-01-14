program prt_8;
uses
  crt;
var
  a, b, d : Real;
begin
  ClrScr;
  Write('Input Value A : ');
  ReadLn(a);
  Write('Input Value B : ');
  ReadLn(b);
  Write('Input Value D : ');
  ReadLn(d);
  WriteLn('Equation 1 Result is ',A+B/2*D+3:0:3);
  WriteLn('Equation 2 Result is ',(A+B)/2*D+3:0:3);
  WriteLn('Equation 3 Result is ',A+B/2*(D+3):0:3);
  ReadLn;
end.