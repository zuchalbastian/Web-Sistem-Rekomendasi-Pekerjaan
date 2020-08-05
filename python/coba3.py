# Load libraries

import pandas as pd
from pandas.plotting import scatter_matrix
from pandas import DataFrame
import matplotlib.pyplot as plt
from sklearn import model_selection
from sklearn.metrics import classification_report
from sklearn.metrics import confusion_matrix
from sklearn.metrics import accuracy_score
import itertools 
import seaborn as sns
from sklearn.ensemble import GradientBoostingClassifier
from sklearn.metrics import accuracy_score, roc_auc_score, roc_curve

#modeling parametes
from sklearn.naive_bayes import GaussianNB
from sklearn.linear_model import LogisticRegression
from sklearn.tree import DecisionTreeClassifier
from sklearn.discriminant_analysis import LinearDiscriminantAnalysis
from sklearn.neighbors import KNeighborsClassifier
from sklearn.svm import SVC

# Load dataset

df = pd.read_csv("data/train2.csv")
print(df)   
# features and target
# target = 'Outcome'
target = 'Kebutuhan'
features = ['KT_1','KT_2','KT_3','KT_4','KT_5','KT_6','KT_7','KT_8','PD_1',
            'PD_2','PD_3','IPK_1','US_1','US_2','US_3','JK_1','FG_1','PL_1','BS_1']

X = df[features]
Y = df[target]

# Menampilkan 5 data teratas dari csv
print(df.head())

# Menampilkan column, data type, dan ukuran file 
print(df.info()) 

# Menampilkan seluruh rows x column contoh 203 rows x 21 columns
print(df.shape)

# Menampilkan deskripsi rata" isi setiap columns dan menampilkan fungsi mean,count,std,min dll
print(df.describe())

# box and whisker plots
# df.plot(kind='box', subplots=True, layout=(2,2), sharex=False, sharey=False)

#print dataset KT_1
# print(df.groupby('KT_1').size())
# print(df.groupby('KT_2').size())
# print(df.groupby('KT_3').size())
# print(df.groupby('KT_4').size())
# print(df.groupby('KT_5').size())
# print(df.groupby('KT_6').size())
# print(df.groupby('KT_7').size())
# print(df.groupby('KT_8').size())
# print(df.groupby('PD_1').size())
# print(df.groupby('PD_2').size())
# print(df.groupby('PD_3').size())
# print(df.groupby('IPK_1').size())
# print(df.groupby('US_1').size())
# print(df.groupby('US_2').size())
# print(df.groupby('US_3').size())
# print(df.groupby('JK_1').size())
# print(df.groupby('FG_1').size())
# print(df.groupby('PL_1').size())
# print(df.groupby('BS_1').size())


# histograms
df.hist()

# scatter plot matrix
scatter_matrix(df)
# plt.show()

# Split-out validation dataset
# array = df.values
# X = array[:,0:4]
# Y = array[:,4]
seed = 7
X_train, X_validation, Y_train, Y_validation = model_selection.train_test_split(X, Y, test_size=0.20, random_state=seed)

print('ini data x train', X_train.shape)
print('ini data y train', Y_train.shape)
print('ini data x validasi', X_validation.shape)
print('ini data y validasi', Y_validation.shape)

# Test options and evaluation metric
seed = 7
scoring = 'accuracy'

# Spot Check Algorithms
models = []
# models.append(('LR', LogisticRegression()))
# models.append(('LDA', LinearDiscriminantAnalysis()))
# models.append(('KNN', KNeighborsClassifier()))
# models.append(('CART', DecisionTreeClassifier()))
# models.append(('SVM', SVC()))
models.append(('NB', GaussianNB()))

# evaluate each model in turn
results = []
names = []
for name, model in models:
    kfold = model_selection.KFold(n_splits=10, random_state=seed)
    cv_results = model_selection.cross_val_score(model, X_train, Y_train, cv=kfold, scoring=scoring)
    results.append(cv_results)
    names.append(name)
    msg = "%s: %f (%f)" % (name, cv_results.mean(), cv_results.std())
print(msg)

# Compare Algorithms
fig = plt.figure()
fig.suptitle('Algorithm Comparison')
ax = fig.add_subplot(111)
plt.boxplot(results)
ax.set_xticklabels(names)
# # plt.show()

# Make predictions on validation dataset
NB = GaussianNB()
NB.fit(X_train, Y_train)
predictions = NB.predict(X_validation)
print(accuracy_score(Y_validation, predictions))
# print(confusion_matrix(Y_validation, predictions))
print(classification_report(Y_validation, predictions))

import pickle
pickle.dump(NB, open('model.pkl', 'wb'))
