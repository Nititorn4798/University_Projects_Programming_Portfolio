program stacknum_019; //V1
uses
  crt;
var
  stackPointer : Integer = 0;
  selectMenu : Integer;
  dataStack : array[1..5] of String;
  i : Integer;
begin
  ClrScr;
  repeat
    WriteLn('+------------+');
    WriteLn('|    Menu    |');
    WriteLn('|  1. Push   |');
    WriteLn('|  2. Pop    |');
    WriteLn('|  3. Exit   |');
    WriteLn('+------------+');
    Write('Select Number : ');

    ReadLn(selectMenu);

    case (selectMenu) of
      1 :
        begin
          if stackPointer = 5 then
          begin
            WriteLn('');
            ClrScr;
            WriteLn('Stack is Overflow!');
          end
          else
          begin
            stackPointer := stackPointer + 1;
            ClrScr;
            WriteLn('Pointer is : ',stackPointer);
            Write('Input Data : ');
            read(dataStack[stackPointer]);
            for i := 1 to 5 do
            begin
              Write('Array [',i,'] = ',dataStack[i], '  ')
            end;
          end;
          WriteLn('');
        end;
      2 :
        begin
          if stackPointer = 0 then
          begin
            WriteLn('');
            ClrScr;
            WriteLn('Stack is Underflow!');
          end
          else
          begin
            ClrScr;
            WriteLn('Pointer is : ',stackPointer);
            WriteLn('Data is    : ',dataStack[stackPointer]);
            for i := 1 to 5 do
            begin
              Write('Array [',i,'] = ',dataStack[i], '  ');
            end;
            WriteLn('');
            dataStack[stackPointer] := '';
            for i := 1 to 5 do
            begin
              Write('Array [',i,'] = ',dataStack[i], '  ');
            end;
            stackPointer := stackPointer - 1;
          end;
          WriteLn('');
        end;
      else
        begin
          break
        end;
    end;
  until False;  
  WriteLn('By Nititorn Nantasin 65003263019')
end.