program prt_33;
uses
  crt;
var
  Age : Real = 0;
  stdAge : Real;
  i : Integer = 1;
begin
  ClrScr;
  repeat
    Write('Input Student Age [',i,'] 0 to Exit : ');
    ReadLn(stdAge);
    Age := Age + stdAge;
    i := i + 1;
  until (stdAge = 0);
  if (stdAge = 0) and (Age <> 0)  then
  begin
    WriteLn('Round ',i-1,' Data entry is canceled by the user.');
    stdAge := Age / (i-2);
    WriteLn('The average age of the ', i-2 ,' students is ', stdAge:0:2 ,' years.');
  end
  else
  begin
    WriteLn('Error!');
  end;
  ReadLn;
end.