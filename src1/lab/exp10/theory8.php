<html>
<title>Word and its features</title>
<body>
<p style="font-size:14px;">
<b><u>Hidden Markov Model</u></b>
<br/><br/>
In the mid 1980s, researchers in Europe began to use Hidden Markov models (HMMs) to disambiguate parts of speech. HMMs involve counting cases, and making a table of the probabilities of certain sequences. For example, once you've seen an article such as 'the', perhaps the next word is a noun 40% of the time, an adjective 40%, and a number 20%. Knowing this, a program can decide that "can" in "the can" is far more likely to be a noun than a verb or a modal. The same method can of course be used to benefit from knowledge about following words.
<br/><br/>
More advanced ("higher order") HMMs learn the probabilities not only of pairs, but triples or even larger sequences. So, for example, if you've just seen an article and a verb, the next item may be very likely a preposition, article, or noun, but much less likely another verb.
<br/><br/>
When several ambiguous words occur together, the possibilities multiply. However, it is easy to enumerate every combination and to assign a relative probability to each one, by multiplying together the probabilities of each choice in turn.
<br/><br/>
It is worth remembering, as Eugene Charniak points out in Statistical techniques for natural language parsing, that merely assigning the most common tag to each known word and the tag "proper noun" to all unknowns, will approach 90% accuracy because many words are unambiguous.
<br/><br/>
HMMs underlie the functioning of stochastic taggers and are used in various algorithms. Accuracies for one such algorithm (TnT) on various training data is shown here.
<br/><br/><br/>
<b><u>Conditional Random Field</u></b>
<br/><br/>
Conditional random fields (CRFs) are a class of statistical modelling method often applied in machine learning, where they are used for structured prediction. Whereas an ordinary classifier predicts a label for a single sample without regard to "neighboring" samples, a CRF can take context into account. Since it can consider context, therefore CRF can be used in Natural Language Processing. Hence, Parts of Speech tagging is also possible. It predicts the POS using the lexicons as the context.
<br/><br/><br/><br/><br/>
In this experiment both algorithms are used for training and testing data. As the size of training corpus increases, it is observed that accuracy increases. Further, even features also play an important role for better output. In this experiment, we can see that Parts of Speech as a feature performs better than only lexicon as the feature. Therefore, it is important to select proper features for training a model to have better accuracy.
</p>
</body>
</html>
