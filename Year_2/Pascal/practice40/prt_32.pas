program prt_32;
uses
  crt;
var
  cusName : String[100];
  cusBirthY : Integer; 
  cusAge : Integer;
begin
  ClrScr;
  Write('Input Customer Name : ');
  ReadLn(cusName);
  Write('Input Customer Birth Year in B.E. : ');
  ReadLn(cusBirthY);
  cusAge := 2566 - cusBirthY;
  if cusAge > 15 then
  begin
    WriteLn('Take 3 tablets at a time.');
  end
  else if (cusAge > 8) and (cusAge <= 15) then
  begin
    WriteLn('Take 2 tablets at a time.');
  end
  else if (cusAge >= 5) and (cusAge <= 7) then
  begin
    WriteLn('Take 1 tablet at a time.');
  end
  else if (cusAge > 0) and (cusAge < 5) then
  begin
    WriteLn('Do not eat.');
  end
  else
  begin
    WriteLn('Input Out of Range.')
  end;
  ReadLn;
end.