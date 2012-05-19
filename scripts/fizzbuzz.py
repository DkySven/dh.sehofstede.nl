#!/usr/bin/env python
#FizzBuzz

for i in range(101):
	if i % 3 != 0 and i % 5 != 0:
		print(i)
		continue
	
	if i % 3 == 0:
		print("Fizz")

	if i % 5 == 0:
		print("Buzz")
