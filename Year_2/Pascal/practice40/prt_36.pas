program prt_36;
uses
  crt;
var
  stdNameArr   : array[1..50] of String[30];
  stdAgeArr    : array[1..50] of Integer;
  stdHeightArr    : array[1..50] of Real;
  stdGenderArr : array[1..50] of String[6];
  i : Integer = 1;
  tempstdHeight : Real;
begin
  ClrScr;
  repeat
    WriteLn('Input Student [',i,']');
    Write('Please enter student Name.   : ');
    ReadLn(stdNameArr[i]);
    Write('Please enter student Age.    : ');
    ReadLn(stdAgeArr[i]);
    Write('Please enter student Height. : ');
    ReadLn(stdHeightArr[i]);
    Write('Please enter student Gender. : ');
    ReadLn(stdGenderArr[i]);
    i := i + 1;
  until (i = 51);
  i := 1;
  repeat
    WriteLn('Show Student [',i,']');
    tempstdHeight := stdHeightArr[i];
    if (tempstdHeight < 140.0) or (tempstdHeight > 170.0) then
    begin
      WriteLn('   Student Name.   : ',stdNameArr[i]);
      WriteLn('   Student Age.    : ',stdAgeArr[i]);
      WriteLn('   Student Height. : ',stdHeightArr[i]:0:2);
      WriteLn('   Student Gender. : ',stdGenderArr[i]);
    end
    else
    begin
      WriteLn('   This student is not less than 140 or more than 170 tall.');
    end;
    i := i + 1;
  until (i = 51);
  ReadLn;
end.