program queuenum_019; //V1
uses
  crt;
var
  selectMenu : Integer;
  dataQueue : array[1..5] of String;
  i : Integer;
  rQueuePointer : Integer = 0;
  fQueuePointer : Integer = 0;
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
        if fQueuePointer = 5 then
          begin
            WriteLn('');
            ClrScr;
            WriteLn('Queue is Overflow!');
          end
        else
        begin
          fQueuePointer := fQueuePointer + 1;
          ClrScr;
          WriteLn('F Pointer is : ',fQueuePointer);
          Write('Input Data : ');
          read(dataQueue[fQueuePointer]);
          for i := 1 to 5 do
          begin
            Write('Array [',i,'] = ',dataQueue[i], '  ')
          end;
          WriteLn('');
        end;
      end;
      2 :
      begin
        if rQueuePointer = fQueuePointer then
          begin
            WriteLn('');
            ClrScr;
            WriteLn('Queue is Underflow!');
          end
        else
        begin
          ClrScr;
          for i := 1 to 5 do
          begin
            Write('Array [',i,'] = ',dataQueue[i], '  ')
          end;
          WriteLn('');
          rQueuePointer := rQueuePointer + 1;
          WriteLn('F Pointer is : ',fQueuePointer);
          WriteLn('Data is      : ',dataQueue[rQueuePointer]);
          dataQueue[rQueuePointer] := '';
          for i := 1 to 5 do
          begin
            Write('Array [',i,'] = ',dataQueue[i], '  ')
          end;
          WriteLn('');
        end;
      end;
      else
        begin
          break
        end;
    end;
  until False;
  WriteLn('By Nititorn Nantasin 65003263019')
end.
