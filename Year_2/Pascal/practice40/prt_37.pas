program prt_37;
uses
  crt;
var
  num : Real = 0;
  total : Real = 0;
  i : Integer = 0;
begin
  ClrScr;
  repeat
    Write('Input Number [',i+1,'/5] : ');
    ReadLn(num);
    total := total + num;
    i := i + 1;
  until (i = 5);
  WriteLn('   Sum is ',total:0:2);
  WriteLn('   The average is ',(total / i):0:2);
  ReadLn;
end.