Feature: Content Negotiation support
  In order to make the API supporting several input and output formats
  As an API developer
  I need to be able to specify the format I want to use

  @createSchema
  @dropSchema
  Scenario: Post an XML body
    When I add "HTTP_Accept" header equal to "application/xml"
    And I send a "POST" request to "/dummies" with body:
    """
    <root>
        <name>XML!</name>
    </root>
    """
    Then the header "Content-Type" should be equal to "application/xml"
    And the response should be equal to
    """
<?xml version="1.0"?>
<response><id>1</id><name>XML!</name><alias/><dummyDate/><jsonData/><dummy/><relatedDummy/><relatedDummies/><nameConverted/></response>
    """
