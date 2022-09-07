# Objective

1. Implement the hierarchical inheritance design pattern

## Program Logic

`DirectMessage`
* Messages can only be posted and read by its members
* The title should be a comma separated string of the chat's members usernames
* You may need to revisit the accessibility of the `$messages` property on the `Chat` class

## Requirements

* Create two child classes that are derived from the existing `Chat` class; `DirectMessage` and `Channel`
* Create a new `$channel` and new `$directMessage` object
* Verify a direct message conversation can only be read by its members
