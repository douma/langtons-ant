Feature: Langton's ant
  
Scenario: Start facing north move one time
	Given I am facing "north"
	Given I start at 100,100 
	When I move 1 times
	Then I should be facing "east"
	Then the tile 100,100 should be "marked"

Scenario: Start facing north move two times
	Given I am facing "north"
	Given I start at 100,100 
	When I move 2 times
	Then I should be facing "south"
	Then the tile 100,100 should be "marked"
	Then the tile 101,100 should be "marked"

Scenario: Start facing north move three times
	Given I am facing "north"
	Given I start at 100,100 
	When I move 3 times
	Then I should be facing "west"
	Then the tile 100,100 should be "marked"
	Then the tile 101,100 should be "marked"
	Then the tile 101,99 should be "marked"

Scenario: Start facing north move six times
	Given I am facing "north"
	Given I start at 100,100 
	When I move 6 times
	Then I should be facing "north"
	Then the tile 101,100 should be "marked"
	Then the tile 101,100 should be "marked"
	Then the tile 100,99 should be "marked"
	Then the tile 99,100 should be "marked"

Scenario: Start facing south move three times
	Given I am facing "south"
	Given I start at 100,100 
	When I move 3 times
	Then I should be facing "east"
	Then the tile 100,100 should be "marked"
	Then the tile 99,100 should be "marked"
	Then the tile 99,101 should be "marked"
