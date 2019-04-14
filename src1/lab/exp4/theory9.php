<html>
<title>Bigrams</title>
<body>
<br>
A combination of words forms a sentence. However, such a formation is meaningful  only when the words are arranged in some order. <br/>
Eg:  Sit I car in the<br/>
Such a sentence is not grammatically acceptable. However some perfectly grammatical sentences can be nonsensical too!<br/>
Eg: Colorless green ideas sleep furiously<br/>
One easy way to handle such unacceptable sentences is by assigning probabilities to the strings of words i.e, how likely the sentence is. <br/>

<h3> Probability of a sentence </h3><br/>

If we consider each word occurring in its correct location as an independent event,the probability of the sentences is : P(w(1), w(2)..., w(n-1), w(n))<br/>
Using chain rule:<br/>
=P(w(1))P(w(2) | w(1))P(w(3) | w(1)w(2))... P(w(n) | w(1)w(2)…w(n-1))<br/><br/>
<h3> Bigrams</h3><br/>
We can avoid this very long calculation by approximating  that the probability of a given word depends only on the probability of its previous words. This assumption is called Markov assumption and such a model is called Markov model- bigrams. Bigrams can be generalized to the n-gram which looks at (n-1) words in the past. A bigram is a first-order Markov model. <br/>

Therefore , <br/>

     P(w(1), w(2)..., w(n-1), w(n))= P(w(2)|w(1))P(w(3)|w(2))….P(w(n)|w(n-1))<br/>

We use (eos) tag to mark the beginning and end of a sentence.<br/>
A bigram table for a given corpus can be generated and used as a lookup table for calculating probability of sentences.<br/><br/>

Eg:
 
Corpus – (eos) You book a flight (eos) I read a book (eos) You read (eos) <br/><br/>

Bigram Table:<br/>
<table border="1">
<tr>
<th></th><th>(eos)</th><th> you </th> <th> book </th> <th> a </th> <th> flight </th> <th> I </th> <th> read </th> </tr>
<tr>
<th> (eos)</th><td> 0</td><td> 0.5</td><td>0</td><td> 0 </td> <td> 0 </td> <td> 0.25 </td><td> 0 </td> </tr>
<tr>
<th>you</th><td>0</td><td> 0 </td><td>0.5</td><td> 0 </td> <td> 0 </td> <td> 0</td> <td>0.5</td></tr>
<tr>
<th>book</th><td> 0.5 </td><td> 0</td><td>0</td><td> 0.5 </td> <td> 0 </td> <td> 0</td> <td>0</td></tr>
<tr>
<th>a</th><td> 0 </td><td> 0</td><td>0.5</td><td> 0 </td> <td> 0.5 </td> <td> 0</td> <td>0</td> </tr>  
<tr>
<th>flight</th><td> 1 </td><td> 0</td><td>0</td><td> 0 </td> <td> 0 </td> <td> 0</td> <td>0</td> </tr> 
<tr>
<th>I</th><td> 0 </td><td> 0</td><td>0</td><td> 0 </td> <td> 0 </td> <td> 0</td> <td>1</td> </tr>
<tr>
<th>read</th><td> 0.5 </td><td> 0</td><td>0</td><td> 0.5 </td> <td> 0 </td> <td> 0</td> <td>0</td> </tr> 
</table> 
 
<br/>
<br/>
P((eos) you read a book (eos))<br/>
= P(you|eos)P(read|you)P(a|read)P(book|a)P(eos|book)<br/>
= 0.5*0.5*0.5*0.5*0.5<br/>
=.00025<br/>

</body>
</html>
